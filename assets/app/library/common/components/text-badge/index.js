import React from "react";
import styled, {css} from "styled-components";

const TextBadge = (props) => {
    const TextBadgeWrapper = styled.span`
display: inline-block;
padding: 2px 5px;
border-radius: 4px;
text-transform: uppercase;
font-weight: bold;
font-size: 12px;

  ${props.color && css`
    background: ${props.color};
  `}

  ${props.fontColor && css`
    color: ${props.fontColor};
  `}
`;
    return (
        <TextBadgeWrapper>
            {props.text}
        </TextBadgeWrapper>
    )
}

export default TextBadge;