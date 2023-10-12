import React, { useEffect, useRef, useState } from 'react';
import { motion, useAnimation } from 'framer-motion';

const FramerMotion2 = () => {
  const controls = useAnimation();
  const ref = useRef();

  const styles = {
    // display: flex,
    // fontSize: '3rem',
    // color: rgb(243, 160, 144),
    // marginBottom: '30px',
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
        hidden: { opacity: 0, x: -700 },
      }}
      transition={{ duration: 1.8, ease: "easeInOut" }}

    >
      By
    </motion.p>
  );
};

export default FramerMotion2;
