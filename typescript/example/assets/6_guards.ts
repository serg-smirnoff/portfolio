// example 1

function strip(x: string | number){
    if (typeof x === 'number'){
        return x.toFixed(2)
    }
    return x.trim()
}

class MyResponse{
    header = 'response header'
    result = 'response result'
}

class MyError{
    header = 'error header'
    message = 'error result'
}

function handle(res: MyResponse | MyError){
    if (res instanceof MyResponse){
        return{
            info: res.header + res.result
        }
    } else {
        return{
            info: res.header + res.message
        }
    }
}

// example 2

type AlertType = 'success' | 'danger' | 'warning'

function setAlertType(type: AlertType){
    // ...
}

setAlertType('success')
setAlertType('warning')
// Argument of type '"default"' is not assignable to parameter of type 'AlertType'.
// setAlertType('default')