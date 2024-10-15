import React from "react";
import ReactDOM from "react-dom/client";
import KanbanApp from "./KanbanApp";

if (document.getElementById("kanban")) {
    ReactDOM.createRoot(document.getElementById("kanban")).render(
        <React.StrictMode>
            <KanbanApp />
        </React.StrictMode>
    );
}
