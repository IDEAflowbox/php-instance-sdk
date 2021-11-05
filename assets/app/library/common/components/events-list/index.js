import React from "react";
import {Table} from "antd";
import columns from './_columns';

export const EventTranslations = {
    view: 'Podgląd produktu',
    recommendation_frame: 'Kliknięcie w ramkę rekomendacyjną',
    cart: 'Dodanie do koszyka',
    wishlist: 'Dodanie do listy życzeń',
    purchase: 'Zakup produktu',

}

const EventsList = (props) => {
    return <Table columns={columns} {...props}/>
}

export default EventsList;