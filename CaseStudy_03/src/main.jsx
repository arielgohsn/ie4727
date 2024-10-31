import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import FormValidationExample from './FormValidationExample.jsx'
import './index.css'

createRoot(document.getElementById('root')).render(
  <StrictMode>
    <FormValidationExample/>
  </StrictMode>,
)
