import React from "react";
import ReactDOM from "react-dom/client";
import ChatBox from "../../components/Chat/ChatBox.jsx";

if (document.getElementById("chat")) {
    const rootUrl = `${import.meta.env.VITE_APP_URL}/admin`;

    ReactDOM.createRoot(document.getElementById("chat")).render(
        <React.StrictMode>
            <ChatBox rootUrl={rootUrl} />
        </React.StrictMode>
    );
}
