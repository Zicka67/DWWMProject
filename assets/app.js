import React from 'react';
import ReactDOM from 'react-dom';
import FramerMotion1 from './FramerMotion1';
import FramerMotion2 from './FramerMotion2';
import TextAnimation from './TextAnimation';

document.addEventListener('DOMContentLoaded', () => {
    const root1 = document.querySelector('.react-root1');
    const root2 = document.querySelector('.react-root2');
    const textContainer = document.querySelector('.animate-this-text');
    
    if (root1) {
        ReactDOM.render(<FramerMotion1 />, root1);
    }
    
    if (root2) {
        ReactDOM.render(<FramerMotion2 />, root2);
    }

    if (textContainer) {
        const initialContent = textContainer.textContent || textContainer.innerText;
        const initialStyle = window.getComputedStyle(textContainer).cssText; // Récupérer le style CSS
        ReactDOM.render(<TextAnimation text={initialContent} style={initialStyle} />, textContainer);
    }
      
});

  



