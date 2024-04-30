interface Person{
    name: string
    age: number
}

type PersonKeys = keyof Person // 'name' | 'age'

let key: PersonKeys = 'name'
key = 'age'

// Type '"job"' is not assignable to type 'keyof Person'.
// key = 'job'

type User = {
    _id: number
    name: string
    email: string
    createdAt: Date
}

type UserKeysNoMeta1 = Exclude<keyof User, '_id' | 'createdAt'> // 'name' | 'email'
type UserKeysNoMeta2 = Pick<User, 'name' | 'email'> // 'name' | 'email'

let varUserKeysNoMeta1: UserKeysNoMeta1 = 'name'

// Type '"_id"' is not assignable to type 'UserKeysNoMeta1'.
// varUserKeysNoMeta1 = '_id'

console.log(varUserKeysNoMeta1)
//console.log(varUserKeysNoMeta2)
