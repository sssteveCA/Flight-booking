import { AutoChangeTypes, AutoPowerSupplies } from "../../values/enums"

export default interface CarRentalHtmlInterface{
    day_price: number,
    details: DetailsInterface,
    html_elements_id: {
        images: string, info: string
    },
    images: string[]
}

interface DetailsInterface{
    baggages: string,
    change: AutoChangeTypes,
    doors: number,
    power_supply: AutoPowerSupplies,
    seats: number
}

