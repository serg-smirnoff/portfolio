var TypeScript = /** @class */ (function () {
    function TypeScript(version) {
        this.version = version;
    }
    TypeScript.prototype.info = function (name) {
        return "[".concat(name, "]: TypeScript version is ").concat(this.version);
    };
    return TypeScript;
}());
console.log(TypeScript);
var ts = new TypeScript('test');
console.log(JSON.stringify(ts));
// variant 1 (classic variant)
var Car1 = /** @class */ (function () {
    function Car1(theModel) {
        this.numberOfWheels = 4;
        this.model = theModel;
    }
    return Car1;
}());
// variant 2 (new variant: attributes in constructor function() arguments)
var Car2 = /** @class */ (function () {
    function Car2(model) {
        this.model = model;
        this.numberOfWheels = 4;
    }
    return Car2;
}());
var car1 = new Car1('Audi');
console.log(car1);
var car2 = new Car2('BMW');
console.log(car2);
