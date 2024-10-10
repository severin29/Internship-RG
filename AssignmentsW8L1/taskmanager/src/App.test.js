import { render, screen } from '@testing-library/react';
import TaskCounter from './TaskCounter';

test( 'renders TaskCounter correctly', () => {
  const { getByText } = render(<TaskCounter />);
  expect (getByText(/Total Tasks/i)).toBeInTheDocument();
});


