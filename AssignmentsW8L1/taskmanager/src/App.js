import React from 'react';
import TaskManager from './TaskManager';
import { TaskProvider } from './TaskContext';
import 'bootstrap/dist/css/bootstrap.min.css';


const App = () => (
    <TaskProvider>
        <TaskManager />
    </TaskProvider>
);

export default App;
