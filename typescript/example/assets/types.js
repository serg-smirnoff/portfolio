// Boolean
var flag1 = true;
var flag2 = false;
console.log("flag1 " + typeof (flag1) + ": " + flag1);
console.log("flag2 " + typeof (flag2) + ": " + flag2);
// Number
var int = 123;
var float = 12.2;
var num = 3e10;
console.log("type " + typeof (int) + ": " + int);
console.log("type " + typeof (float) + ": " + float);
console.log("type " + typeof (num) + ": " + num);
// String
var str = 'Hello';
console.log("type " + typeof (str) + ": " + str);
// array
var list = [1, 2, 3];
console.log("type " + typeof (list) + ": " + list);
// Array generic
var list2 = [1, 2, 3];
console.log("type " + typeof (list2) + ": " + list2);
// Tuple
var tuple = ['test', 123];
console.log("type " + typeof (tuple) + ": " + tuple);
// Any
var variable = 42;
variable = 'test';
console.log("type " + typeof (variable) + ": " + variable);
variable = 54;
console.log("type " + typeof (variable) + ": " + variable);
variable = [];
console.log("type " + typeof (variable) + ": " + variable);
// Enum
var Color;
(function (Color) {
    Color[Color["Red"] = 0] = "Red";
    Color[Color["Green"] = 1] = "Green";
    Color[Color["Blue"] = 2] = "Blue";
})(Color || (Color = {}));
var enum1 = Color.Green;
console.log("type " + typeof (variable) + ": " + variable);
// Function
var a = function sayMyName1(name) {
    if (name === void 0) { name = 'test'; }
    console.log("type " + typeof (name) + ": " + name);
};
console.log("type " + typeof (a) + ": " + a);
function sayMyName2(name) {
    if (name === void 0) { name = 'test'; }
    console.log("type " + typeof (name) + ": " + name);
}
sayMyName2('test');
var login = 'admin';
// const login2: Login = 2 
console.log("type " + typeof (login) + ": " + login);
var id1 = 'test';
console.log("type " + typeof (id1) + ": " + id1);
var id2 = 42;
console.log("type " + typeof (id2) + ": " + id2);
var st = 'st';
console.log("type " + typeof (st) + ": " + st);
// class Human{
//     name : string;
//     age : number;
//     constructor (name : string, age : number) {
//         this.name = name;
//         this.age  = age;
//     }
// }
// let user : Human = new Human ('Serg', 40);
// console.log(user);
