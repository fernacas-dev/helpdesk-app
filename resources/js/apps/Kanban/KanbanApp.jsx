import { axios } from "../../config/axios";
import { useState, useEffect } from "react";
import TaskForm from "./components/TaskForm";
import TaskColumn from "./components/TaskColumn";
import "./KanbanApp.css";

const oldTasks = localStorage.getItem("tasks");

const KanbanApp = () => {
    const [tasks, setTasks] = useState(JSON.parse(oldTasks) || []);
    const [activeCard, setActiveCard] = useState(null);

    useEffect(() => {
        function getTickets() {
            axios
                .get("/api/tickets")
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

        getTickets();
    }, []);

    useEffect(() => {
        localStorage.setItem("tasks", JSON.stringify(tasks));
    }, [tasks]);

    const handleDelete = (taskIndex) => {
        const newTasks = tasks.filter((task, index) => index !== taskIndex);
        setTasks(newTasks);
    };

    const onDrop = (status, position) => {
        console.log(
            `${activeCard} is going to place into ${status} and at the position ${position}`
        );

        if (activeCard === null || activeCard === undefined) return;

        const taskToMove = tasks[activeCard];
        const updatedTasks = tasks.filter(
            (task, index) => index !== activeCard
        );

        updatedTasks.splice(position, 0, {
            ...taskToMove,
            status: status,
        });

        setTasks(updatedTasks);
    };

    return (
        <div className="app">
            <TaskForm setTasks={setTasks} />
            <main className="app_main">
                <TaskColumn
                    title="To do"
                    icon={""}
                    tasks={tasks}
                    status="todo"
                    handleDelete={handleDelete}
                    setActiveCard={setActiveCard}
                    onDrop={onDrop}
                />
                <TaskColumn
                    title="Doing"
                    icon={""}
                    tasks={tasks}
                    status="doing"
                    handleDelete={handleDelete}
                    setActiveCard={setActiveCard}
                    onDrop={onDrop}
                />
                <TaskColumn
                    title="Done"
                    icon={""}
                    tasks={tasks}
                    status="done"
                    handleDelete={handleDelete}
                    setActiveCard={setActiveCard}
                    onDrop={onDrop}
                />
            </main>
        </div>
    );
};

export default KanbanApp;
