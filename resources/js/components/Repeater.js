import React from 'react';

function Repeater(props) {
    
    const generateKey = (pre) => {
        return `${ pre }_${ new Date().getTime() }`;
    }

    const elements = [];
    
    for (let i = 0; i < props.repeat; i++) {
        elements.push(React.cloneElement(props.children, { key : generateKey(`${i}_${props.repeat + i}`) }));    
    }
    
    return (
        <div className="repeater">
            { elements }
        </div>
    );
}

export default Repeater;
