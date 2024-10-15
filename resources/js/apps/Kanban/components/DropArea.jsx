import { useState } from "react";
import "./DropArea.css";

function DropArea({ onDrop }) {
  const [showDrop, setShowDrop] = useState(false);
  return (
    <section
      onDragEnter={() => setShowDrop(true)}
      onDragLeave={() => setShowDrop(false)}
      className={showDrop ? "drop_area" : "hide_drop"}
      onDrop={() => {
        onDrop();
        setShowDrop(false);
      }}
      onDragOver={(e) => e.preventDefault()}
    >
      Drop Here
    </section>
  );
}

export default DropArea;
