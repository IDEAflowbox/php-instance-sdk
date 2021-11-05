import React, {useState} from "react";
import EmojiPicker from "emoji-picker-react";
import {Button, Dropdown, Input, Space} from "antd";

const EmojiPickerInput = (props) => {
    const [value, setValue] = useState(undefined);

    const change = (val) => {
        if (props.onChange) {
            props.onChange(val);
        }
    }

    const onEmojiClick = (event, emojiObject) => {
        let val = (value ? value : "")+emojiObject.emoji
        setValue(val)
        change(val);
    };

    const onChange = (e) => {
        setValue(e.target.value);
        change(e.target.value);
    }

    return (
        <div style={{width: '100%', display: 'flex', gap: 10}}>
            <Input {...props} value={value} onChange={onChange}/>
            <Dropdown overlay={<EmojiPicker onEmojiClick={onEmojiClick}/>} trigger="click">
                <Button>😃</Button>
            </Dropdown>
        </div>
    )
}

export default EmojiPickerInput;