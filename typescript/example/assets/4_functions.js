function add(a, b) {
    return a + b;
}
function toUpperCase(str) {
    return str.trim().toUpperCase();
}
console.log('function add() returns = ' + add(4, 5));
function position(a, b) {
    if (!a && !b) {
        return { x: undefined, y: undefined };
    }
    if (a && !b) {
        return { x: a, y: undefined, default: a.toString() };
    }
    return { x: a, y: b };
}
console.log('Empty: ' + JSON.stringify(position()));
console.log('One param: ' + JSON.stringify(position(42)));
console.log('Two params: ' + JSON.stringify(position(10, 15)));
