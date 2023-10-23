import React, { useEffect, useRef, useState } from 'react';
import { motion, AnimatePresence } from 'framer-motion';
import './app.css';

const TextAnimation = ({ text }) => {
  const [visibleText, setVisibleText] = useState("");
  const [isVisible, setIsVisible] = useState(false); 
  const ref = useRef(null);
  const delay = 100;

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
