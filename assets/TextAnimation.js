import React, { useEffect, useRef, useState } from 'react';
import { motion, AnimatePresence } from 'framer-motion';
import './styleREACT.css';


const TextAnimation = ({ text }) => {
  const [visibleText, setVisibleText] = useState("");
  const [isVisible, setIsVisible] = useState(false); 
  const ref = useRef(null);
  const delay = 100; // délai en millisecondes entre chaque lettre

  useEffect(() => {
    setIsVisible(true); 
    let index = 0;
    const interval = setInterval(() => {
      if (index < text.length) {
        setVisibleText((prev) => prev + text[index]);
        index++;
      } else {
        clearInterval(interval);
      }
    }, delay);
    return () => {
      clearInterval(interval);
    };
  }, [text]);

  return (
    <div 
      ref={ref} 
      style={{ 
        fontFamily: "'Barlow', sans-serif",
        color: "#AB873D",
        fontSize: "3rem",
        fontWeight: 600,
        letterSpacing: "-0.054em",
        width: "680px",
        margin: "0 auto",
        paddingLeft: "25px",
        visibility: isVisible ? 'visible' : 'hidden' 
      }}
    >
      <AnimatePresence>
        {visibleText.split("").map((char, index) => (
          <motion.strong
            key={index}
            className="style-react"
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            exit={{ opacity: 0 }}
            transition={{ duration: 0.5 }}
          >
            {char === ' ' ? '\u00A0' : char} {/* Remplace les espaces par des espaces insécables */}
          </motion.strong>
        ))}
      </AnimatePresence>
    </div>
  );
};

export default TextAnimation;
