using lab9.Controller;
using lab9.Model;
using lab9.Util;
using System;
using System.Windows.Forms;

namespace lab9.View.MainMenu.EventHandlers
{
    public class HarmonicKindEventHandler
    {
        private RadioButton _sinRadioButton;
        private RadioButton _cosRadioButton;
        private IMenuController _mainMenuController;
        private ListBox _harmonicList;

        public HarmonicKindEventHandler( IMenuController mainMenuController, ListBox harmonicList, RadioButton sinRadioButton, RadioButton cosRadioButton )
        {
            _mainMenuController = mainMenuController;
            _sinRadioButton = sinRadioButton;
            _cosRadioButton = cosRadioButton;
            _harmonicList = harmonicList;
            _sinRadioButton.CheckedChanged += new EventHandler( SinRadioButton_CheckedChanged );
            _cosRadioButton.CheckedChanged += new EventHandler( CosRadioButton_CheckedChanged );
        }

        private void SinRadioButton_CheckedChanged( object sender, EventArgs e )
        {
            if ( !_sinRadioButton.Focused || _harmonicList.SelectedIndex == -1 )
            {
                return;
            }
            _mainMenuController.SetNewHarmonicKind( _harmonicList.SelectedIndex, HarmonicType.Sin );
        }

        private void CosRadioButton_CheckedChanged( object sender, EventArgs e )
        {
            if ( !_cosRadioButton.Focused || _harmonicList.SelectedIndex == -1 )
            {
                return;
            }
            _mainMenuController.SetNewHarmonicKind( _harmonicList.SelectedIndex, HarmonicType.Cos );
        }
    }
}
