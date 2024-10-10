import React, { useContext } from 'react';
import { TaskContext } from './TaskContext';

const TaskCounter = () => {
    const { tasks } = useContext(TaskContext);
    return <h2 className="text-center mb-4">Total Tasks: {tasks.length}</h2>;
};

export default TaskCounter;
