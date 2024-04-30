function add(a: number, b: number): number{
    return a+b
}

function toUpperCase(str: string): string{
    return str.trim().toUpperCase()
}

console.log('function add() returns = ' + add(4,5))

/* перегрузка функций */

interface MyPosition{
    x: number | undefined
    y: number | undefined
}

interface MyPositionWithDefault extends MyPosition{
    default: string
}

function position(): MyPosition
function position(a: number): MyPositionWithDefault
function position(a: number, b: number): MyPosition
function position(a?: number, b?: number) {
    
    if (!a && !b){
        return {x: undefined, y: undefined}
    }

    if (a && !b){
        return {x: a, y: undefined, default: a.toString()}
    }
    
    return {x: a, y: b}
}

console.log('Empty: ' + JSON.stringify(position()))
console.log('One param: ' + JSON.stringify(position(42)))
console.log('Two params: ' + JSON.stringify(position(10,15)))
