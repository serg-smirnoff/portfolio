// Boolean
let flag1: boolean = true;
let flag2: boolean = false;

console.log("flag1 " + typeof(flag1)   + ": " + flag1);
console.log("flag2 " + typeof(flag2) + ": " + flag2);

// Number
let int: number = 123;
let float: number = 12.2;
let num: number = 3e10;

console.log("type " + typeof(int)   + ": " + int);
console.log("type " + typeof(float) + ": " + float);
console.log("type " + typeof(num)   + ": " + num);

// String
let str: string = 'Hello';
console.log("type " + typeof(str) + ": " + str);

// array
let list: number[] = [1, 2, 3];
console.log("type " + typeof(list) + ": " + list);

// Array generic
let list2: Array<number> = [1, 2, 3];
console.log("type " + typeof(list2) + ": " + list2);

// Tuple
let tuple: [string, number] = ['test',123];
console.log("type " + typeof(tuple) + ": " + tuple);

// Any
let variable: any = 42;
variable = 'test';
console.log("type " + typeof(variable) + ": " + variable);
variable = 54;
console.log("type " + typeof(variable) + ": " + variable);
variable = [];
console.log("type " + typeof(variable) + ": " + variable);

// Enum
enum Color {
    Red,
    Green,
    Blue,
}

let enum1: Color = Color.Green;

console.log("type " + typeof(variable) + ": " + variable);

// Function
let a = function sayMyName1(name: string = 'test'): void {
    console.log("type " + typeof(name) + ": " + name);    
}

console.log("type " + typeof(a) + ": " + a);

function sayMyName2(name: string = 'test'): void {
    console.log("type " + typeof(name) + ": " + name);    
}
sayMyName2('test');

// Never
function throwError(m: string): never {
    throw new Error(m);
}

throwError('test');

function infinite(): never {
    while(true){
    }
}

// Type
type Login = string;
const login: Login = 'admin';
// const login2: Login = 2 
console.log("type " + typeof(login) + ": " + login);

type ID = string|number;
const id1 = 'test'
console.log("type " + typeof(id1) + ": " + id1);
const id2 = 42
console.log("type " + typeof(id2) + ": " + id2);

type SomeType = string | null | undefined;
let st: SomeType = 'st';

console.log("type " + typeof(st) + ": " + st);
