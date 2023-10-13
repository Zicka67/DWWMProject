import React, { useEffect, useRef, useState } from 'react';
import { motion, useAnimation } from 'framer-motion';

const FramerMotion1 = () => {
  const controls = useAnimation();
  const ref = useRef();

  const styles = {
    color: 'rgb(249, 155, 148)',
    fontSize: '1.8rem',
    padding: '20px 20px',
    fontWeight: 400,
    fontFamily: "'Knewave', cursive",
    marginTop: '10px',
    marginLeft: '-15px',
  };

  const checkIfVisible = () => {
    const rect = ref.current.getBoundingClientRect();
    if (rect.top <= window.innerHeight && rect.bottom >= 0) {
      controls.start("visible");
      // Une fois l'anim lancée, supprime l'écouteur pour améliorer les perf
      window.removeEventListener('scroll', checkIfVisible);
    }
  };

  useEffect(() => {
    window.addEventListener('scroll', checkIfVisible);
    // Vérifie si l'élément est visible
    checkIfVisible();
    return () => {
      // Nettoye l'écouteur d'event au démontage
      window.removeEventListener('scroll', checkIfVisible);
    };
  }, []);

  return (
    <motion.p
      ref={ref}
      style={styles}
      initial="hidden"
      animate={controls}
      variants={{
        visible: { opacity: 1, x: 0 },
        hidden: { opacity: 0, x: 800 },
      }}
      transition={{ duration: 1.8, ease: "easeInOut" }}
    >
      Bienvenue au cours d'allaitement : Un voyage d'amour et de nutrition
    </motion.p>
  );

};

export default FramerMotion1;
