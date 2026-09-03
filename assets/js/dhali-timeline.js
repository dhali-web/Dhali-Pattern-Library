/**
 * Dhali Pattern Library — Scroll Timeline
 *
 * Vanilla JS re-implementation of the Meatlers scroll-timeline
 * interaction. No jQuery, no Elementor lifecycle dependency.
 *
 * JS owns state only, per the locked architecture:
 *   - a single unitless progress value (0-1) written to the
 *     --dhali-timeline-progress custom property, which CSS turns
 *     into a scaleY() fill on a pseudo-element.
 *   - the .is-active class on items whose center has passed
 *     the viewport center.
 *
 * There is no DOM node for JS to create or remove: the rail,
 * progress fill, and markers are all CSS pseudo-elements
 * already present on .dhali-timeline / .dhali-timeline__item.
 *
 * Geometry is read live via getBoundingClientRect() inside the
 * rAF-scheduled update rather than cached at init/resize. That
 * avoids a real staleness bug: cached document-relative offsets
 * go wrong the moment content height changes without a resize
 * event (an image finishing loading, a web font swap, an editor
 * adding an item) — the CSS rail adjusts automatically since it
 * has no cached state, but a cached JS measurement would not.
 * getBoundingClientRect() is always current, so there is nothing
 * to invalidate.
 *
 * Behavior:
 *  - Progress tracks the center of the viewport continuously
 *    (not event-to-event jumps).
 *  - Each .dhali-timeline__item gets .is-active once its own
 *    center has passed the viewport center.
 *  - Disabled below the mobile breakpoint via matchMedia,
 *    matching the CSS breakpoint in timeline.css (both track
 *    core Gutenberg's own Columns stacking point — keep in
 *    sync, and re-verify both against the target WP version).
 */
(function () {
    "use strict";

    var BREAKPOINT = "(max-width: 781px)";
    var mql = window.matchMedia(BREAKPOINT);

    var instances = [];
    var rafId = null;

    function TimelineInstance(el) {
        this.el = el;
        this.items = Array.prototype.slice.call(
            el.querySelectorAll(".dhali-timeline__item")
        );
    }

    TimelineInstance.prototype.update = function (viewportCenter) {
        var rect = this.el.getBoundingClientRect();
        if (!rect.height) return;

        var progress = Math.min(
            1,
            Math.max(0, (viewportCenter - rect.top) / rect.height)
        );

        this.el.style.setProperty("--dhali-timeline-progress", progress);

        for (var i = 0; i < this.items.length; i++) {
            var itemRect = this.items[i].getBoundingClientRect();
            var itemCenter = itemRect.top + itemRect.height / 2;
            this.items[i].classList.toggle(
                "is-active",
                itemCenter <= viewportCenter
            );
        }
    };

    TimelineInstance.prototype.reset = function () {
        this.el.style.removeProperty("--dhali-timeline-progress");
        this.items.forEach(function (item) {
            item.classList.remove("is-active");
        });
    };

    function updateAll() {
        rafId = null;

        // Guard here rather than only in the enable/disable
        // lifecycle: this is what actually prevents a scroll or
        // resize event queued right at the breakpoint boundary
        // from re-writing state after a mobile teardown. Simpler
        // and more robust than cancelling pending timers/frames.
        if (mql.matches) return;

        var viewportCenter = window.scrollY + window.innerHeight / 2;
        instances.forEach(function (instance) {
            instance.update(viewportCenter);
        });
    }

    function scheduleUpdate() {
        if (rafId === null) {
            rafId = window.requestAnimationFrame(updateAll);
        }
    }

    function onScrollOrResize() {
        scheduleUpdate();
    }

    var listenersBound = false;

    function bindListeners() {
        if (listenersBound) return;
        window.addEventListener("scroll", onScrollOrResize, { passive: true });
        window.addEventListener("resize", onScrollOrResize);
        listenersBound = true;
    }

    function unbindListeners() {
        if (!listenersBound) return;
        window.removeEventListener("scroll", onScrollOrResize);
        window.removeEventListener("resize", onScrollOrResize);
        listenersBound = false;
    }

    function enable() {
        bindListeners();
        scheduleUpdate();
    }

    function disable() {
        unbindListeners();
        instances.forEach(function (instance) {
            instance.reset();
        });
    }

    function handleBreakpointChange(e) {
        if (e.matches) {
            disable(); // now in mobile range — tear down
        } else {
            enable(); // now in desktop range — spin up
        }
    }

    function init() {
        var els = document.querySelectorAll(".dhali-timeline");
        if (!els.length) return;

        instances = Array.prototype.map.call(els, function (el) {
            return new TimelineInstance(el);
        });

        if (!mql.matches) {
            enable();
        }

        // Support both modern and legacy MediaQueryList listener APIs.
        if (mql.addEventListener) {
            mql.addEventListener("change", handleBreakpointChange);
        } else if (mql.addListener) {
            mql.addListener(handleBreakpointChange);
        }
    }

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", init);
    } else {
        init();
    }
})();
