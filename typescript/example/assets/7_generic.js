// generic
var arrayOfNumbers = [1, 1, 2, 3, 5];
var arrayOfStrings = ['Hello', 'Vladilen'];
// generic Type (генерируемый тип)
function reverse(array) {
    return array.reverse();
}
reverse(arrayOfNumbers);
reverse(arrayOfStrings);
