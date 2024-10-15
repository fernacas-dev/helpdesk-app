import React from "react";
import ReactDOM from "react-dom/client";
import "../../css/app.css";
import ChatBox from "./ChatBox.jsx";

if (document.getElementById("chat")) {
    const rootUrl = "http://localhost:8000/admin";

    ReactDOM.createRoot(document.getElementById("chat")).render(
        <React.StrictMode>
            <ChatBox rootUrl={rootUrl} />
        </React.StrictMode>
    );
}
