
export default interface CarRentalHtmlInterface{
    day_price: number,
    details: DetailsInterface,
    images: string[]
}

interface DetailsInterface{
    baggages: string,
    change: string,
    doors: number,
    power_supply: string,
    seats: number
}

