import React from "react";
import {Badge, Button} from "antd";
import {createModal} from "../../../../../library/common/components/modal";
import ActivateSenderModal from "./activate-sender-modal";

const handleActivateModal = (senderId) => {
    const modal = createModal({
        width: '90%',
        style: {maxWidth: 480},
        content: <ActivateSenderModal close={() => modal.destroy()} senderId={senderId}/>
    });
}

const columns = [
    {
        title: 'Nadawca',
        key: 'name',
        dataIndex: 'name',
    },
    {
        title: 'Status',
        key: 'activated',
        dataIndex: 'activated',
        render: (activated) => {
            return <Badge status={activated ? 'success' : 'warning'} text={activated ? 'Aktywny' : 'Nieaktywny'} />
        }
    },
    {
        title: ' ',
        key: 'actions',
        align: 'right',
        render: (_, sender) => {
            return <Button disabled={sender.activated} onClick={() => handleActivateModal(sender.id)}>Aktywuj</Button>
        }
    }
]

export default columns;