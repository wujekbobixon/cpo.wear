(function($) {
    var slide = function(ele,options) {
        var $ele = $(ele);
        var setting = {
            speed: 1000,
            interval: 6000,
            
        };
        $.extend(true, setting, options);
        var states = [
            { $zIndex: 1, width: 20+"%", height: 100+"%", top: 0, left: 100+"%", $opacity: 0.2 },
            { $zIndex: 2, width: 20+"%", height: 100+"%", top: 0, left: 100+"%", $opacity: 0.2 },
            { $zIndex: 3, width: 40+"%", height: 100+"%", top: 0, left: 100+"%", $opacity: 0.2 },
            { $zIndex: 4, width: 60+"%", height: 100+"%", top: 0,left:50+"%", $opacity: 1 },
            { $zIndex: 3, width: 40+"%", height: 100+"%", top: 0, left: 0+"%", $opacity: 0.2 },
            { $zIndex: 2, width: 20+"%", height: 100+"%", top: 0, left: 0+"%", $opacity: 0.2 },
            { $zIndex: 1, width: 20+"%", height: 100+"%", top: 0, left: 0+"%", $opacity: 0.2 }
        ];

        var $lis = $ele.find('li');
        var timer = setInterval(next, setting.interval);

        $ele.find('.hi-next').on('click', function() {
            clearInterval(timer);
            timer= null;
            next();
            timer = setInterval(next, setting.interval);
        });
        $ele.find('.hi-prev').on('click', function() {
            states.push(states.shift());
            clearInterval(timer);
            timer= null;
            move();
            timer = setInterval(next, setting.interval);
        });
        move();
        function move() {
            $lis.each(function(index, element) {
                var state = states[index];
                $(element).css('zIndex', state.$zIndex).finish().animate(state, setting.speed).find('img').css('opacity', state.$opacity);

            });
        }
        function next() {
            states.unshift(states.pop());
            move();
        }

    }
    $.fn.hiSlide = function(options) {
        $(this).each(function(index, ele) {
            slide(ele,options);
        });
        return this;
    }
})(jQuery);
