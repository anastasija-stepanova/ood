using lab9.Controller;
using lab9.Model;
using lab9.Util;
using lab9.View.MainMenu.EventHandlers;
using System;
using System.Windows.Forms;

namespace lab9.View.MainMenu
{
    public partial class MainMenuView : Form, IObserverHarmoic, IObserverHarmonicContainer
    {
        private IHarmonicContainerView _harmonicContainer;
        private IMenuController _mainMenuController;
        private HarmonicContainerVizualizer _harmonicContainerVizualization;
        private AmplitudeEventHandler _amplitudeEventHandler;
        private FrequencyEventHandler _frequencyEventHandler;
        private PhaseEventHandler _phaseEventHandler;
        private HarmonicKindEventHandler _harmonicKindEventHandler;

        public MainMenuView( IHarmonicContainerView harmonicContainer, IMenuController mainMenuController )
        {
            InitializeComponent();
            _mainMenuController = mainMenuController;
            _harmonicContainer = harmonicContainer;
            _harmonicContainerVizualization = new HarmonicContainerVizualizer( _harmonicContainer, tabPage1, chartTableView );
            _harmonicContainer.AddObserver( _harmonicContainerVizualization );
            InitializeEventHandlers();
        }

        public void AddedNewHarmonic( int index )
        {
            harmonicList.Items.Add( Utils.ConvertHarmonicToStr(_harmonicContainer.GetAllPresentation() [ index ]) );
        }

        public void RemovedHarmonic( int index )
        {
            harmonicList.Items.RemoveAt( index );
            ResetHarmonicPropertiesView();
        }

        public void HarmonicPropertiesChanged()
        {
            _harmonicContainerVizualization.Update();
            if ( harmonicList.SelectedIndex != -1 )
            {
                UpdateStringPresentation( harmonicList.SelectedIndex );
            }
            else
            {
                ResetHarmonicPropertiesView();
            }
        }

        private void UpdateStringPresentation( int harmonicIndex )
        {
            harmonicList.Items [ harmonicIndex ] = Utils.ConvertHarmonicToStr( _harmonicContainer.GetAllPresentation() [ harmonicIndex ] );
        }

        private void SetHarmonicPropertiesToView( IHarmonicView harmonic )
        {
            textBox1.Text = harmonic.GetAmplitude().ToString();
            textBox3.Text = harmonic.GetFrequency().ToString();
            textBox2.Text = harmonic.GetPhase().ToString();
            radioButton1.Checked = harmonic.GetHarmonicKind() == HarmonicType.Sin ? true : false;
            radioButton2.Checked = harmonic.GetHarmonicKind() == HarmonicType.Cos ? true : false;
        }

        private void ResetHarmonicPropertiesView()
        {
            textBox1.Text = "";
            textBox3.Text = "";
            textBox2.Text = "";
            radioButton1.Checked = false;
            radioButton2.Checked = false;
            harmonicList.SelectedIndex = -1;
            EnableInputMethods( false );
        }

        private void EnableInputMethods( bool value )
        {
            textBox1.Enabled = value;
            textBox3.Enabled = value;
            textBox2.Enabled = value;
            radioButton1.Enabled = value;
            radioButton2.Enabled = value;
            button2.Enabled = value;
        }

        private void HarmonicList_SelectedIndexClicked( object sender, EventArgs e )
        {
            if ( harmonicList.SelectedIndex >= 0 )
            {
                EnableInputMethods( true );
                var harmonicPresentation = _harmonicContainer.GetAllPresentation() [ harmonicList.SelectedIndex ];
                SetHarmonicPropertiesToView( harmonicPresentation );
            }
        }

        private void DeleteHarmonicButton_Click( object sender, EventArgs e )
        {
            if ( harmonicList.SelectedIndex != -1 )
            {
                _mainMenuController.RemoveHarmonic( harmonicList.SelectedIndex );
            }
        }

        private void AddNewHarmonicButton_Click( object sender, EventArgs e )
        {
            _mainMenuController.StartAddingNewHarmonic();
        }

        private void MainMenu_Load( object sender, EventArgs e )
        {
            EnableInputMethods( false );
        }

        private void HarmonicList_SelectedIndexChanged( object sender, EventArgs e )
        {
            if ( harmonicList.Items.Count == 0 )
            {
                EnableInputMethods( false );
            }
        }

        private void InitializeEventHandlers()
        {
            _amplitudeEventHandler = new AmplitudeEventHandler( _mainMenuController, harmonicList, errorProvider1, textBox1 );
            _frequencyEventHandler = new FrequencyEventHandler( _mainMenuController, harmonicList, errorProvider2, textBox3 );
            _phaseEventHandler = new PhaseEventHandler( _mainMenuController, harmonicList, errorProvider3, textBox2 );
            _harmonicKindEventHandler = new HarmonicKindEventHandler( _mainMenuController, harmonicList, radioButton1, radioButton2 );
        }

        private void amplitudeTextBox_TextChanged( object sender, EventArgs e )
        {

        }
    }
}