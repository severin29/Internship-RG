import React, { useContext } from 'react';
import { TaskContext } from './TaskContext';

const TaskItem = ({ task, index }) => {
    const { toggleComplete, deleteTask } = useContext(TaskContext);

    return (
        <li
            className={`list-group-item d-flex justify-content-between align-items-center ${
                task.completed ? 'list-group-item-success' : ''
            }`}
        >
      <span style={{ textDecoration: task.completed ? 'line-through' : 'none' }}>
        {task.text}
      </span>
            <div>
                <button
                    onClick={() => toggleComplete(index)}
                    className="btn btn-sm btn-success mr-2"
                >
                    {task.completed ? 'Undo' : 'Complete'}
                </button>
                <button onClick={() => deleteTask(index)} className="btn btn-sm btn-danger">
                    Delete
                </button>
            </div>
        </li>
    );
};

export default TaskItem;
