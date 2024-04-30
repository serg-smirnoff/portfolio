enum Membership{
    Simple,
    Standart,
    Premium
}

console.log('enum Membership = ' + JSON.stringify(Membership))

const membership = Membership.Standart
console.log('Enum index via value = ' + membership)

const membershipReverse = Membership[2]
console.log('Enum value via index = ' + membershipReverse)


enum SocialMedia{
    VK = 'VK',
    FACEBOOK = 'FACEBOOK',
    INSTAGRAM = 'INSTAGRAM'
}

const social = SocialMedia.INSTAGRAM
console.log(social);