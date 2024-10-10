import React, { useContext } from 'react';
import TaskCounter from './TaskCounter';
import TaskList from './TaskList';
import { TaskContext } from './TaskContext';

const TaskManager = () => {
    const { task, setTask, addTask } = useContext(TaskContext);

    return (
        <div className="container mt-4">
            <h1 className="text-center">Task Manager</h1>
            <TaskCounter />
            <div className="input-group mb-3">
                <input
                    type="text"
                    className="form-control"
                    value={task}
                    onChange={(e) => setTask(e.target.value)}
                    placeholder="Add a new task"
                />
                <button className="btn btn-primary" onClick={addTask}>Add Task</button>
            </div>
            <TaskList />
        </div>
    );
};

export default TaskManager;
