import React, { createContext, useState, useEffect } from 'react';

// Create the Context
export const TaskContext = createContext();

// Create the Provider
export const TaskProvider = ({ children }) => {
    const [tasks, setTasks] = useState([]);
    const [task, setTask] = useState("");

    // Load tasks from localStorage when the component mounts
    useEffect(() => {
        const storedTasks = JSON.parse(localStorage.getItem("tasks"));
        if (storedTasks) setTasks(storedTasks);
    }, []);

    // Save tasks to localStorage whenever tasks change
    useEffect(() => {
        localStorage.setItem("tasks", JSON.stringify(tasks));
    }, [tasks]);

    // Add new task
    const addTask = () => {
        if (task.trim()) {
            setTasks([...tasks, { text: task, completed: false }]);
            setTask(""); // Clear input after adding
        }
    };

    // Toggle task completion
    const toggleComplete = (index) => {
        setTasks(prevTasks =>
            prevTasks.map((task, i) =>
                i === index ? { ...task, completed: !task.completed } : task
            )
        );
    };

    // Delete a task
    const deleteTask = (index) => {
        setTasks(prevTasks => prevTasks.filter((_, i) => i !== index));
    };

    return (
        <TaskContext.Provider value={{ tasks, task, setTask, addTask, toggleComplete, deleteTask }}>
            {children}
        </TaskContext.Provider>
    );
};
