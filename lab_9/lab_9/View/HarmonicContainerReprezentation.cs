using System;
using System.Windows.Forms;
using System.Windows.Forms.DataVisualization.Charting;
using lab_9.Model;

namespace lab_9.View
{
    class HarmonicContainerReprezentation
    {
        private const double COORDINATE_STEP = 0.5;
        private const int COORDINATE_AMOUNT = 20;

        private double[,] _harmonicChartCoordinate;
        private IHarmonicContainerView _harmonicContainer;
        private Chart _chart;
        private DataGridView _tableView;

        public HarmonicContainerReprezentation(IHarmonicContainerView harmonicContainer, TabPage tabPage, DataGridView tableView)
        {
            _harmonicContainer = harmonicContainer;
            _chart = new Chart
            {
                Parent = tabPage,
                Dock = DockStyle.Fill
            };
            _tableView = tableView;
            InitializeTable();
        }

        public void Update()
        {
            UpdateHarmonicChartYCoordinate();
            DrawChart();
            FillTableYValue();
        }

        public void AddNewHarmonic(int index)
        {
            var harmonics = _harmonicContainer.GetViews();
            AddHarmonicYCoordinate(harmonics[index]);
            DrawChart();
            FillTableYValue();
        }

        private void InitializeTable()
        {
            _harmonicChartCoordinate = new double[COORDINATE_AMOUNT, 2];
            _tableView.RowCount = COORDINATE_AMOUNT;
            _tableView.ColumnCount = 2;
            _tableView.Columns[0].HeaderText = "x";
            _tableView.Columns[1].HeaderText = "y";
            double xValue = 0;
            for (int i = 0; i < COORDINATE_AMOUNT; i++)
            {
                _harmonicChartCoordinate[i, 0] = Math.Round(xValue, 5);
                xValue += COORDINATE_STEP;
            }
        }

        private void DrawChart()
        {
            _chart.Series.Clear();
            _chart.ChartAreas.Clear();
            _chart.ChartAreas.Add(new ChartArea("ChartGraphic"));
            _chart.ChartAreas[0].AxisX.Minimum = 0;
            _chart.ChartAreas[0].AxisX.Maximum = COORDINATE_STEP * 12;
            Series mySeriesOfPoint = new Series
            {
                ChartType = SeriesChartType.Spline,
                ChartArea = "ChartGraphic"
            };
            int rows = _harmonicChartCoordinate.GetUpperBound(0) + 1;
            for (int i = 0; i < rows; i++)
            {
                mySeriesOfPoint.Points.AddXY(_harmonicChartCoordinate[i, 0], _harmonicChartCoordinate[i, 1]);
            }
            _chart.Series.Add(mySeriesOfPoint);
        }

        private void UpdateHarmonicChartYCoordinate()
        {
            ResetYCoordinate();
            var harmonics = _harmonicContainer.GetViews();
            foreach (var harmonic in harmonics)
            {
                AddHarmonicYCoordinate(harmonic);
            }
        }

        private void ResetYCoordinate()
        {
            for (int i = 0; i < COORDINATE_AMOUNT; i++)
            {
                _harmonicChartCoordinate[i, 1] = Math.Round(0.0, 5);
            }
        }

        private void AddHarmonicYCoordinate(IHarmonicView harmonic)
        {
            for (int i = 0; i < COORDINATE_AMOUNT; i++)
            {
                _harmonicChartCoordinate[i, 1] += Math.Round(GetYValue(_harmonicChartCoordinate[i, 0], harmonic), 5);
            }
        }

        private double GetYValue(double xValue, IHarmonicView harmonicPresentation)
        {
            var amplitude = harmonicPresentation.GetAmplitude();
            var frequency = harmonicPresentation.GetFrequency();
            var phase = harmonicPresentation.GetPhase();
            return harmonicPresentation.GetHarmonicType() == HarmonicType.Sin
                ? amplitude * Math.Sin(frequency * xValue + phase)
                : amplitude * Math.Cos(frequency * xValue + phase);
        }

        private void FillTableYValue()
        {
            int rows = _harmonicChartCoordinate.GetUpperBound(0) + 1;
            int columns = _harmonicChartCoordinate.Length / rows;
            for (int i = 0; i < rows; i++)
            {
                for (int j = 0; j < columns; j++)
                {
                    _tableView.Rows[i].Cells[j].Value = _harmonicChartCoordinate[i, j];
                }
            }
        }
    }
}
