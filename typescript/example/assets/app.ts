class Human{
    
    name : string;
    age : number;
    
    constructor (name : string, age : number) {
        this.name = name;
        this.age  = age;
    }
    
}

let user : Human = new Human ('Serg',37);

console.log(user);
