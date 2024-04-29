var rect1 = {
    id: '1234',
    size: {
        width: 20,
        height: 30
    }
};
console.log("type " + typeof (rect1) + ": " + JSON.stringify(rect1));
console.log("rect1.size = " + JSON.stringify(rect1.size));
rect1.color = 'Black';
console.log("rect1.color = " + rect1.color);
console.log("rect1.size.width = " + rect1.size.width);
console.log("rect1.size.height = " + rect1.size.height);
var rect2 = {
    id: '1234',
    size: {
        width: 20,
        height: 30
    },
    getArea: function () {
        return this.size.width * this.size.height;
    }
};
console.log("rect2.getArea() = " + rect2.getArea());
var Clock = /** @class */ (function () {
    function Clock() {
        this.time = new Date();
    }
    Clock.prototype.setTime = function (date) {
        this.time = date;
    };
    return Clock;
}());
var clock = new Clock();
console.log("Clock class  = " + JSON.stringify(Clock));
console.log("Clock object = " + JSON.stringify(clock));
var css = {
    border: '1px solid red',
    margin: '2px 0',
    padding: '20px 0'
};
console.log('css = ' + JSON.stringify(css));
