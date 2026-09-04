# 🤖 Embodied Interaction – Human-AI Emotion Study

This repository contains a web-based experimental study investigating how the **emotional behavior of an AI chatbot influences user perception and interaction**.

Participants interact with an AI system that is randomly assigned either a **positive** or **negative emotional communication style**. The application then evaluates how this affects the perceived quality of the conversation.

---

## 📌 Project Overview

The study consists of three main stages:

1. **Emotion Calibration**
   Participants provide demographic information and rate their current emotional state.

2. **AI Conversation**
   Participants choose a topic and interact with an AI chatbot powered by the **OpenAI API**.

3. **Post-Interaction Evaluation**
   Participants evaluate the conversation regarding aspects such as naturalness, enjoyment, trust, and previous AI experience.

---

## 🎭 Experimental Conditions

At the beginning of the study, the chatbot is randomly assigned one of two communication styles:

* **Positive** – happy and approving
* **Negative** – sad and disapproving

The assigned condition is included in the prompts sent to the language model and influences the tone of the generated responses.

---

## 💬 AI Interaction

Participants can choose between several conversation topics:

* Movies
* Music
* Technology
* Social Media

During the conversation, the application combines the user's response, previous conversation context, and the assigned emotional condition before sending the request to the OpenAI API.

```text
User Input
    ↓
Conversation Context
    +
Emotional Condition
    ↓
OpenAI API
    ↓
AI Response
```

---

## 🛠️ Tech Stack

* PHP
* HTML / CSS
* Bootstrap
* OpenAI API
* PHP Sessions
* JSON-based data handling
* Git / GitHub

---

## 🔬 Research Focus

The project combines concepts from:

* Human-Computer Interaction
* Conversational AI
* Affective Computing
* Generative AI
* Prompt Engineering
* Experimental User Studies

The goal was to investigate not only what an AI says, but **how its emotional communication style affects the human experience of the interaction**.

---

## 🎓 Context

The project was developed at the **University of Bremen** as an academic Human-Computer Interaction project.

The repository is provided for documentation and portfolio purposes.
