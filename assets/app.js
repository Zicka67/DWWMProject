import React from 'react';
import ReactDOM from 'react-dom';
import FramerMotion1 from './FramerMotion1';
import FramerMotion2 from './FramerMotion2';

document.addEventListener('DOMContentLoaded', () => {
    const root1 = document.querySelector('.react-root1');
    const root2 = document.querySelector('.react-root2');
    
    if (root1) {
        ReactDOM.render(<FramerMotion1 />, root1);
    }
    
    if (root2) {
        ReactDOM.render(<FramerMotion2 />, root2);
    }
});
