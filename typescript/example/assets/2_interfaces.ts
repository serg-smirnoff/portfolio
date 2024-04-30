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

console.log("type " + typeof(rect1) + ": " + JSON.stringify(rect1));
console.log("rect1.size = " + JSON.stringify(rect1.size));
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


interface iClock{
    time: Date
    setTime(date: Date): void
}

class Clock implements iClock{
    time: Date = new Date()
    setTime(date: Date): void {
        this.time = date
    }
}

let clock : iClock = new Clock();

console.log("Clock class  = " + JSON.stringify(Clock))
console.log("Clock object = " + JSON.stringify(clock))


interface Styles{
    [key: string]: string
}

const css: Styles = {
    border: '1px solid red',
    margin: '2px 0',
    padding: '20px 0'
}

console.log('css = ' + JSON.stringify(css))