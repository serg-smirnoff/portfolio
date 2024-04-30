var __extends = (this && this.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (Object.prototype.hasOwnProperty.call(b, p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        if (typeof b !== "function" && b !== null)
            throw new TypeError("Class extends value " + String(b) + " is not a constructor or null");
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
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
var Animal = /** @class */ (function () {
    function Animal() {
        this.voice = '';
        this.color = 'black';
        // ok because go() private
        this.go();
    }
    Animal.prototype.go = function () {
        console.log('GO');
    };
    return Animal;
}());
var Cat = /** @class */ (function (_super) {
    __extends(Cat, _super);
    function Cat() {
        return _super !== null && _super.apply(this, arguments) || this;
    }
    Cat.prototype.setVoice = function (voice) {
        this.voice = voice;
        // not ok because go() private
        // Property 'go' is private and only accessible within class 'Animal'.
        // this.go()
    };
    return Cat;
}(Animal));
var cat = new Cat();
cat.setVoice('test');
console.log(cat);
// Property 'voice' is protected and only accessible within class 'Animal' and its subclasses.
// cat.voice
var Component = /** @class */ (function () {
    function Component() {
    }
    return Component;
}());
var AppComponent = /** @class */ (function (_super) {
    __extends(AppComponent, _super);
    function AppComponent() {
        return _super !== null && _super.apply(this, arguments) || this;
    }
    AppComponent.prototype.render = function () {
        console.log('Component on render');
    };
    AppComponent.prototype.info = function () {
        return 'Just string';
    };
    return AppComponent;
}(Component));
