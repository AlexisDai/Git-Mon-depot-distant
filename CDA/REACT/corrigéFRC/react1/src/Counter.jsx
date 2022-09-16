import {React, useState} from 'react';
import { Encore } from './Encore';

const Counter = (props) => {

    const [counter, setCounter] = useState(0);

    const handlePlus = (evt) => {
        console.log("plus");
        let tmp = counter+1;
        setCounter(tmp);
        props.onChange?.(tmp);
    }

    const handleMoins = (evt) => {
        console.log("moins");
        let tmp = counter-1;
        setCounter(tmp);
        if (props.onChange) props.onChange(tmp);
        
    }


    console.log("render " + props.name + "...");

    return (
        <div>
            <button onClick={handleMoins}>-</button>
            <span>
                {counter}
            </span>
            <button onClick={handlePlus}>+</button>
            <hr />
            <Encore titi={counter} />
        </div>
    );
}

export { Counter };