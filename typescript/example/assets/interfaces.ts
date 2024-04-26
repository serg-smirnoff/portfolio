interface Rect{
    readonly id: string,
    color?: string,
    size: {
        width: number,
        height: number
    }
}

interface RectWithArea extends Rect{
    getArea: () => number
}

const rect1: Rect = {
    id: '1234',
    size: {
        width: 20,
        height: 30
    }
}

console.log("type " + typeof(rect1) + ": " + rect1);
console.log("rect1.size = " + rect1.size);
rect1.color = 'Black';
console.log("rect1.color = " + rect1.color);

console.log("rect1.size.width = " + rect1.size.width);
console.log("rect1.size.height = " + rect1.size.height);


const rect2: RectWithArea = {
    id: '1234',
    size: {
        width: 20,
        height: 30
    },
    getArea(): number{
        return this.size.width * this.size.height;
    }
}

console.log("rect2.getArea() = " + rect2.getArea());


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