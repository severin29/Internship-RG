import React, { useContext } from 'react';
import TaskItem from './TaskItem';
import { TaskContext } from './TaskContext';

const TaskList = () => {
    const { tasks, toggleComplete, deleteTask } = useContext(TaskContext);

    return (
        <ul className="list-group">
            {tasks.map((task, index) => (
                <TaskItem
                    key={index}
                    task={task}
                    index={index}
                    toggleComplete={toggleComplete}
                    deleteTask={deleteTask}
                />
            ))}
        </ul>
    );
};

export default TaskList;
