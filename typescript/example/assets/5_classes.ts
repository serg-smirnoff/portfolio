class TypeScript{
    
    version: string

    constructor (version: string){
        this.version = version
    }

    info(name: string){
        return `[${name}]: TypeScript version is ${this.version}`
    }

}

console.log(TypeScript)

let ts = new TypeScript('test')
console.log(JSON.stringify(ts))

// variant 1 (classic variant)

class Car1 {
    
    readonly model: string
    readonly numberOfWheels: number = 4
    
    constructor(theModel: string){
        this.model = theModel
    }

}

// variant 2 (new variant: attributes in constructor function() arguments)

class Car2 {
    readonly numberOfWheels: number = 4
    constructor(readonly model: string){}
}

let car1 = new Car1('Audi')
console.log(car1)

let car2 = new Car2('BMW')
console.log(car2)


class Animal {
    
    protected voice: string = ''
    public color: string = 'black'

    constructor(){
        // ok because go() private
        this.go()
    }

    private go(){
        console.log('GO')
    }

}

class Cat extends Animal{
    
    public setVoice(voice: string): void{
        this.voice = voice

        // not ok because go() private
        
        // Property 'go' is private and only accessible within class 'Animal'.
        // this.go()

    }

}

const cat = new Cat()
cat.setVoice('test');
console.log(cat)

// Property 'voice' is protected and only accessible within class 'Animal' and its subclasses.
// cat.voice

abstract class Component{
    abstract render(): void
    abstract info(): string
}

class AppComponent extends Component{
    render():void{
        console.log('Component on render')
    }
    info():string{
        return 'Just string'
    }
}