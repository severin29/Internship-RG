import React, {createContext, useEffect, useState} from 'react';

export const TaskContext = createContext();

export const TaskProvider = ({ children }) => {
    const [tasks, setTasks] = useState([]);
    const [task, setTask] = useState('');

    // Save tasks to localStorage whenever tasks change
    useEffect(() => {
        if (tasks.length > 0){
            localStorage.setItem("tasks", JSON.stringify(tasks));
        }
    }, [tasks]);

    // Add new task
    const addTask = () => {
        if (task.trim()) {
            setTasks((prevTasks) => [...prevTasks, { text: task, completed: false }]);
            setTask('');
        }
    };

    const toggleComplete = (index) => {
        setTasks((prevTasks) =>
            prevTasks.map((t, i) => (i === index ? { ...t, completed: !t.completed } : t))
        );
    };

    const deleteTask = (index) => {
        setTasks((prevTasks) => prevTasks.filter((_, i) => i !== index));
    };

    return (
        <TaskContext.Provider value={{ tasks, task, setTask, addTask, toggleComplete, deleteTask }}>
            {children}
        </TaskContext.Provider>
    );
};
