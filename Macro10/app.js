const express = require('express');
const path = require('path');
const multer = require('multer');
const fs = require('fs');

const app = express();

// Set view engine
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));

// Serve static files
app.use(express.static(path.join(__dirname, 'public')));

// Body parser
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// File upload configuration
const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    cb(null, 'public/images');
  },
  filename: (req, file, cb) => {
    cb(null, Date.now() + '-' + file.originalname);
  },
});

const upload = multer({ storage: storage });

// Routes
app.get('/', (req, res) => {
  res.render('/home');
});

app.get('/about', (req, res) => {
  res.render('/about');
});

app.get('/contact', (req, res) => {
  res.render('/contact');
});

app.get('/submit', (req, res) => {
  res.render('/submit');
});

app.post('/submit', upload.single('image'), (req, res, next) => {
  if (!req.file) {
    const error = new Error('Please upload a file');
    error.statusCode = 422;
    next(error);
  } else {
    const data = {
      name: req.body.name,
      message: req.body.message,
      image: req.file.filename,
    };

    fs.writeFile('data.json', JSON.stringify(data), (err) => {
      if (err) {
        next(err);
      } else {
        console.log('Data written to file');
        res.redirect('/about');
      }
    });
  }
});

// Error handling middleware
app.use((err, req, res, next) => {
  console.error(err.stack);
  res.status(err.statusCode || 500).send(err.message || 'Internal server error');
});

// Start server
const PORT = process.env.PORT || 10027;
app.listen(PORT, () => console.log(`Server running on port ${PORT}`));
