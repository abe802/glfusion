var MooTicker = new Class({
    
    Implements: [Options, Events],
    
    options: {
        controls: true,
        delay: 2000,
        duration: 800,
        blankimage: '{site_url}/images/speck.gif'
    },
    initialize: function(b, c) {
        this.setOptions(c);
        this.element = $(b) || null;
        this.element.addEvents({
            'mouseenter': this.stop.bind(this),
            'mouseleave': this.play.bind(this)
        });
        this.news = this.element.getElements('ul li');
        this.current = 0;
        this.fx = [];
        this.news.getParent().setStyle('position', 'relative');
        var d = this;
        this.news.each(function(a, i) {
            a.setStyle('position', 'absolute');
            this.fx[i] = new Fx.Tween(a, {
                property: 'opacity',
                duration: this.options.duration,
                onStart: function() {
                    d.transitioning = true
                },
                onComplete: function() {
                    d.transitioning = false
                }
            }).set(1);
            if (!i) return;
            a.setStyle('opacity', 0)
        },
        this);
        if (this.options.controls) this.addControls();
        this.status = 'stop';
        window.addEvent('load', this.play.bind(this));
        return this
    },
    addControls: function() {
        var a = new Element('span', {
            'class': 'controls'
        }).injectTop(this.element);
        this.arrowPrev = new Element('img', {
            'class': 'control-prev',
            'title': '{prev}',
            'alt': '{prev}',
            'src': this.options.blankimage
        }).inject(a);
        this.arrowNext = new Element('img', {
            'class': 'control-next',
            'title': '{next}',
            'alt': '{next}',
            'src': this.options.blankimage
        }).inject(a);
        this.arrowPrev.addEvent('click', this.previous.bind(this));
        this.arrowNext.addEvent('click', this.next.bind(this));
        return this
    },
    previous: function() {
        if (this.transitioning) return this;
        var a = (!this.current) ? this.news.length - 1 : this.current - 1;
        this.fx[this.current].start(0);
        this.fx[a].start(1);
        this.current = a;
        return this
    },
    next: function() {
        if (this.transitioning) return this;
        var a = (this.current == this.news.length - 1) ? 0 : this.current + 1;
        this.fx[this.current].start(0);
        this.fx[a].start(1);
        this.current = a;
        return this
    },
    play: function() {
        if (this.status == 'play') return this;
        this.status = 'play';
        this.timer = this.next.periodical(this.options.delay + this.options.duration, this);
        return this
    },
    stop: function() {
        this.status = 'stop';
        $clear(this.timer);
        return this
    }
});
