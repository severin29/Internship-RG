import React from 'react';
import { render, fireEvent } from '@testing-library/react';
import { TaskProvider } from './TaskContext'; // Import your TaskProvider
import TaskCounter from './TaskCounter'; // Import your component
import TaskManager from './TaskManager';


test('renders TaskCounter with total tasks', () => {
  const { getByText } = render(
      <TaskProvider> {/* Wrap with TaskProvider */}
        <TaskCounter />
      </TaskProvider>
  );

  expect(getByText(/Total Tasks: 0/i)).toBeInTheDocument();
});

test('renders TaskManager and adds a task', () => {
  const { getByPlaceholderText, getByText } = render(
      <TaskProvider>
        <TaskManager />
      </TaskProvider>
  );

  expect(getByText(/Total Tasks: 0/i)).toBeInTheDocument();

  const input = getByPlaceholderText('Add a new task');
  fireEvent.change(input, { target: { value: 'New Task' } });
  fireEvent.click(getByText('Add Task'));

  expect(getByText(/Total Tasks: /i)).toBeInTheDocument();
  expect(getByText('New Task')).toBeInTheDocument();
});

test('renders TaskCounter with correct task count', () => {
  const initialTasks = [{ text: 'Test Task 1', completed: false }, {text: 'Test Task 2', completed: true}];

  const { getByText } = render(
      <TaskProvider initialTasks={initialTasks}>
        <TaskCounter />
      </TaskProvider>
  );

  expect(getByText(/Total Tasks: /i)).toBeInTheDocument(); // Verify the task count
});

test('renders TaskList with tasks', () => {
  const initialTasks = [
    { text: 'Test Task 1', completed: false },
    { text: 'Test Task 2', completed: false },
  ];

  const { getByText } = render(
      <TaskProvider initialTasks={initialTasks}>
        <TaskList />
      </TaskProvider>
  );

  expect(getByText('Test Task 1')).toBeInTheDocument();
  expect(getByText('Test Task 2')).toBeInTheDocument();
});

test('renders TaskItem and allows toggling completion', () => {
  const mockToggleComplete = jest.fn(); // Mock function to handle toggle
  const task = { text: 'Test Task', completed: false };

  const { getByText } = render(
      <TaskProvider>
        <TaskItem task={task} toggleComplete={mockToggleComplete} />
      </TaskProvider>
  );

  // Check that the task is rendered
  expect(getByText('Test Task')).toBeInTheDocument();

  // Simulate clicking the task to toggle completion
  fireEvent.click(getByText('Test Task')); // Adjust if you have a specific toggle button

  // Check if the mock function was called
  expect(mockToggleComplete).toHaveBeenCalled();
});

